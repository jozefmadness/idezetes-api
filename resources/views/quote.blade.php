@extends('layouts.app')

@section('content')
<div class="container" style="width: 100%">
    <div class="panel panel-primary" style="width: 100%">
        <div class="panel-heading" style="border: none">Quotes</div>
        <div class="panel-body">
            <table cellspacing="0" cellpadding="1" border="1" style="width: 100%; color: #FFFFFF">
                <tr style="font-weight: bold">
                    <td>Quote</td>
                    <td>Quoted</td>
                    <td>Category</td>
                </tr>
                @foreach($quotes as $item)
                    <tr>
                        <td>{{$item->quote}}</td>
                        @foreach($quoted as $qitem)
                            @if($item->quoted==$qitem->id)
                                <td>{{$qitem->name}}</td>
                            @endif
                        @endforeach
                        <td>{{$item->category}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection