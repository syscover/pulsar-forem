<?php namespace Syscover\Forem\GraphQL\Services;

use Syscover\Admin\Services\AttachmentService;
use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Core\Services\SQLService;
use Syscover\Forem\Models\Group;
use Syscover\Forem\Services\GroupService;
use Syscover\Market\Models\Product;
use Syscover\Market\Models\ProductLang;
use Syscover\Market\Services\MarketableService;

class GroupGraphQLService extends CoreGraphQLService
{
    protected $modelClassName = Group::class;
    protected $serviceClassName = GroupService::class;

    public function create($root, array $args)
    {
        $group = $this->service->create($args['payload']);

        if($args['payload']['is_product'])
        {
            $args['payload']['object_type']  = $this->modelClassName;
            $args['payload']['object_id']    = $group->id;

            MarketableService::create($args['payload'], $group);
        }

        return $group;
    }

    public function update($root, array $args)
    {
        $group = $this->service->update($args['payload']);

        if($args['payload']['is_product'])
        {
            $product = Product::where('object_type', $this->modelClassName)->where('object_id', $group->id)->first();

            $args['payload']['object_type']  = $this->modelClassName;
            $args['payload']['object_id']    = $group->id;
            if($product)
            {
                // update product
                MarketableService::update($args['payload']);
            }
            else
            {
                // create product
                MarketableService::create($args['payload'], $group);
            }
        }
        else
        {
            // delete product
            $product = Product::where('object_type', $this->modelClassName)->where('object_id', $group->id)->first();
            if($product)
            {
                // if there are any product, delete all products from all langs, set base_lang to delete all langs
                SQLService::deleteRecord($product->id, Product::class, base_lang(), ProductLang::class);
            }
        }

        return $group;
    }

    public function delete($root, array $args)
    {
        // delete object
        $group = SQLService::deleteRecord($args['id'], $this->modelClassName, $args['lang_id']);

        // delete record from scout
        if (has_scout()) $group->unsearchable();

        // delete attachments object
        AttachmentService::deleteAttachments($args['id'], $this->modelClassName, $args['lang_id']);

        // delete product
        $product = Product::where('object_type', $this->modelClassName)->where('object_id', $group->id)->first();
        if($product)
        {
            SQLService::deleteRecord($product->id, Product::class, $args['lang_id'], ProductLang::class);
        }

        return $group;
    }
}