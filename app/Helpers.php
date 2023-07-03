<?php

use App\Models\Services;


function addToCart($itemId, $qty){
    $service = Services::where('service_id', $itemId)->first();

    $cartItem = array(
        'code' => $itemId,
        'item' => $service->sname,
        'quantity' => $qty,
        'price' => $service->price,
        'total' => $qty*$service->price
    );
    
    $_SESSION["bill_items"][$itemId] = $cartItem;
    
    if (!empty($_SESSION["bill_items"]) && is_array($_SESSION["bill_items"])) {
        return true;
    }
    
    return $_SESSION["bill_items"];
}