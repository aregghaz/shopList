<?php

namespace App\Models;



class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;


    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }else{
            $this->items = null;
        }
    }

    public function add($item,$id,$count)
    {

        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item, 'count' => $count];

        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
                $storedItem['count'] += $count;
                $storedItem['price'] = $item->price *  $storedItem['count'];
                $this->totalPrice +=  $storedItem['price'];
            }
        } else {
            $storedItem['price'] = $item->price * $count;

        }
        $storedItem['qty']++;

        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice =  $storedItem['price'];
    }
    public function delete($item,$id)
    {


        $storedItem = ['qty' => 0, 'item' => $item];

        if($this->items){
            if(array_key_exists($id, $this->items)){

                if($this->items[$id]['item']->id == $id) {

                    $this->totalPrice -= $this->items[$id]['item']->price;
                    unset($this->items[$id]);
                    $this->totalQty--;

                }else {
                    $storedItem = $this->items[$id];
                    $storedItem['qty']++;
                    $storedItem['price'] = $item->price * $storedItem['qty'];
                    $this->items[$id] = $storedItem;
                    $this->totalQty++;
                    $this->totalPrice -= $item->price;
                }

            }
        }


    }
}