<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use Validator;
use Config;
use App\quoted;
use App\quotes;
use App\category;
use App\flag;
use Dingo\Api\Routing\Helpers;
use Symfony\Component\HttpFoundation\Request;


class QuoteController extends Controller
{
    use Helpers;

    public function getVersion(){
        $version = flag::getRow()->name();
        return $version;
    }
    public function randomquote(){
        $quotes = quotes::all();
        $quoted = quoted::all();
        $category = category::all();
        $n = count($quotes);
        $quote = $quotes[rand(0,$n-1)];
        foreach($quoted as $item){
            if($item->id==$quote->quoted){
                $quote->quoted=$item->name;
            }
        }
        foreach($category as $item){
            if($item->id==$quote->category){
                $quote->category=$item->name;
            }
        }
        $array[] = $quote;
        return $array;
    }
    public function randomquoteID(){
        $quotes = quotes::all();
        $n = count($quotes);
        $quote = $quotes[rand(0,$n-1)];
        $array[] = $quote;
        return $quote;
    }
    public function getQbyname(Request $name){
        $quotes = quotes::all();
        $quoted = quoted::all();
        $category = category::all();
        $array = array();
        $id = $name->name;
        foreach($quotes as $item){
            if($item->quoted==$id){
                $array[] = $item;
            }
        }
        foreach($array as $item){
            foreach($quoted as $qitem){
                if($qitem->id==$item->quoted){
                    $item->quoted=$qitem->name;
                }
            }
            foreach($category as $qitem){
                if($qitem->id==$item->category){
                    $item->category=$qitem->name;
                }
            }
        }
        return $array;
    }
    public function getQbynameID(Request $name){
        $quotes = quotes::all();
        $array = array();
        $id = $name->name;
        foreach($quotes as $item){
            if($item->quoted==$id){
                $array[] = $item;
            }
        }
        return $array;
    }
    public function getQbycategory(Request $category){
        $quotes = quotes::all();
        $quoted = quoted::all();
        $categoryl = category::all();
        $array = array();
        $id = $category->category;
        foreach($quotes as $item){
            if($item->category==$id){
                $array[] = $item;
            }
        }
        foreach($array as $item){
            foreach($quoted as $qitem){
                if($qitem->id==$item->quoted){
                    $item->quoted=$qitem->name;
                }
            }
            foreach($categoryl as $qitem){
                if($qitem->id==$item->category){
                    $item->category=$qitem->name;
                }
            }
        }
        return $array;
    }
    public function getQbycategoryID(Request $category){
        $quotes = quotes::all();
        $array = array();
        $id = $category->category;
        foreach($quotes as $item){
            if($item->category==$id){
                $array[] = $item;
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
        $category = category::all();
        $array = array();
        foreach($quotes as $item){
            foreach($quoted as $qitem){
                if($qitem->id==$item->quoted){
                    $item->quoted=$qitem->name;
                }
            }
            foreach($category as $qitem){
                if($qitem->id==$item->category){
                    $item->category=$qitem->name;
                }
            }
            $array[] = $item;
        }
        return $array;
    }
    public function getAllQuoted(){
        return $quoted = quoted::all()->toArray();
    }
    public function getAllCategory(){
        return $category = category::all()->toArray();
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