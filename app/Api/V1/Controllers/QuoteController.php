<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use Validator;
use Config;
use App\quoted;
use App\quotes;
use Dingo\Api\Routing\Helpers;
use Symfony\Component\HttpFoundation\Request;


class QuoteController extends Controller
{
    use Helpers;

    public function getQbyname(Request $name){
        $quotes = quotes::all();
        $quoted = quoted::all();
        $array = array();
        $id = -1;
        foreach($quoted as $item)
        {
            if($item->name==$name->name)
            {
                $id = $item->id;
            }
        }
        foreach($quotes as $item)
        {
            if($item->quoted==$id)
            {
                $array[] = $item;
            }
        }
        foreach($array as $item)
        {
            foreach($quoted as $qitem)
            {
                if($qitem->id==$item->quoted)
                {
                    $item->quoted=$qitem->name;
                }
            }
        }
        return $array;
    }
    public function randomquote(){
        $quotes = quotes::all();
        $quoted = quoted::all();
        $n = count($quotes);
        $quote = $quotes[rand(0,$n-1)];
        foreach($quoted as $item)
        {
            if($item->id==$quote->quoted)
            {
                $quote->quoted=$item->name;
            }
        }
        return $quote;
    }
    public function getQbycategory(Request $category){
        $quotes = quotes::all();
        $array = array();
        foreach($quotes as $item)
        {
            if($item->category==$category->category)
            {
                $array[] = $item;
            }
        }
        $quoted = quoted::all();
        foreach($array as $item)
        {
            foreach($quoted as $qitem)
            {
                if($qitem->id==$item->quoted)
                {
                    $item->quoted=$qitem->name;
                }
            }
        }
        return $array;
    }
    public function getQuoted(Request $id){
        return $quoted = quoted::where('id',$id)->get()->toArray();
    }
    public function getAllQuote(){
        $quoted = quoted::all();
        $quotes = quotes::all();
        foreach($quotes as $item)
        {
            foreach($quoted as $qitem)
            {
                if($qitem->id==$item->quoted)
                {
                    $item->quoted=$qitem->name;
                }
            }
        }
        return $quotes;
    }
    public function getAllQuoted(){
        return $quoted = quoted::all()->toArray();
    }
    public function addQuote(Request $nquote){
        $new = new quotes();
        $new->quote=$nquote['quote'];
        $new->category=$nquote['category'];
        $new->quoted=$nquote['quoted'];
        if($new->save()){
            return $this->response->created();
        }
        else{
            return $this->response->error('could not create quote',500);
        }
    }
    public function addQuoted(Request $nquoted){
        $new = new quoted();
        $new->name=$nquoted['name'];
        if($new->save()){
            return $this->response->created();
        }
        else{
            return $this->response->error('could not create quoted',500);
        }
    }
}