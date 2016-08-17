<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use Validator;
use Config;
use App\quoted;
use App\quotes;
use App\category;
use App\sourcelist;
use Dingo\Api\Routing\Helpers;
use Symfony\Component\HttpFoundation\Request;


class QuoteController extends Controller
{
    use Helpers;

    public function randomquote(){
        $quotes = quotes::all();
        $quoted = quoted::all();
        $source = sourcelist::all();
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
        foreach($source as $item){
            if($item->id==$quote->source){
                $quote->source=$item->name;
            }
        }
        return $quote;
    }
    public function randomquoteID(){
        $quotes = quotes::all();
        $quoted = quoted::all();
        $source = sourcelist::all();
        $category = category::all();
        $n = count($quotes);
        $quote = $quotes[rand(0,$n-1)];
        return $quote;
    }
    public function getQbyname(Request $name){
        $quotes = quotes::all();
        $quoted = quoted::all();
        $source = sourcelist::all();
        $category = category::all();
        $array = array();
        $id = -1;
        foreach($quoted as $item){
            if($item->name==$name->name){
                $id = $item->id;
            }
        }
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
            foreach($source as $qitem){
                if($qitem->id==$item->source){
                    $item->source=$qitem->name;
                }
            }
        }
        return $array;
    }
    public function getQbynameID(Request $name){
        $quotes = quotes::all();
        $quoted = quoted::all();
        $array = array();
        $id = -1;
        foreach($quoted as $item){
            if($item->name==$name->name){
                $id = $item->id;
            }
        }
        foreach($quotes as $item){
            if($item->quoted==$id){
                $array[] = $item;
            }
        }
        return $array;
    }
    public function getBySource(Request $source){
        $quotes = quotes::all();
        $quoted = quoted::all();
        $sourcel = sourcelist::all();
        $category = category::all();
        $array = array();
        $id = -1;
        foreach($sourcel as $item){
            if($item->name==$source->source){
                $id = $item->id;
            }
        }
        foreach($quotes as $item){
            if($item->source==$id){
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
            foreach($sourcel as $qitem){
                if($qitem->id==$item->source){
                    $item->source=$qitem->name;
                }
            }
        }
        return $array;
    }
    public function getBySourceID(Request $source){
        $quotes = quotes::all();
        $sourcel = sourcelist::all();
        $array = array();
        $id = -1;
        foreach($sourcel as $item){
            if($item->name==$source->source){
                $id = $item->id;
            }
        }
        foreach($quotes as $item){
            if($item->source==$id){
                $array[] = $item;
            }
        }
        return $array;
    }
    public function getQbycategory(Request $category){
        $quotes = quotes::all();
        $quoted = quoted::all();
        $source = sourcelist::all();
        $categoryl = category::all();
        $array = array();
        $id = -1;
        foreach($categoryl as $item){
            if($item->name==$category->category){
                $id = $item->id;
            }
        }
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
            foreach($source as $qitem){
                if($qitem->id==$item->source){
                    $item->source=$qitem->name;
                }
            }
        }
        return $array;
    }
    public function getQbycategoryID(Request $category){
        $quotes = quotes::all();
        $categoryl = category::all();
        $array = array();
        $id = -1;
        foreach($categoryl as $item){
            if($item->name==$category->category){
                $id = $item->id;
            }
        }
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
        $source = sourcelist::all();
        $category = category::all();
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
            foreach($source as $qitem){
                if($qitem->id==$item->source){
                    $item->source=$qitem->name;
                }
            }
        }
        return $quotes;
    }
    public function getAllQuoted(){
        return $quoted = quoted::all()->toArray();
    }
    public function getAllCategory(){
        return $category = category::all()->toArray();
    }
    public function getAllSource(){
        return $source = sourcelist::all()->toArray();
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