@extends('layouts.app')

@section('content')
<div class="container" style="width: 100%">
    <div class="panel panel-primary" style="width: 100%">
        <div class="panel-heading" style="border: none">Quotes</div>
        <div class="panel-body">
            <table style="color: #FFFFFF;border-color: #008779;background-color: #008779;border-collapse: separate;border-spacing: 2px" border="1">
                <tr>
                    <td style="color: #FFFFFF;border-color: #008779;background-color: #008779;font-weight: bold">Quote</td>
                    <td style="color: #FFFFFF;border-color: #008779;background-color: #008779;font-weight: bold">Quoted</td>
                    <td style="color: #FFFFFF;border-color: #008779;background-color: #008779;font-weight: bold">Category</td>
                    <td style="color: #FFFFFF;border-color: #008779;background-color: #008779;font-weight: bold">Source</td>
                </tr>
                @foreach($quotes as $item)
                    <tr>
                        <td style="color: #FFFFFF;border-color: #008779;background-color: #008779">{{$item->quote}}</td>
                        @foreach($quoted as $qitem)
                            @if($item->quoted==$qitem->id)
                                <td style="color: #FFFFFF;border-color: #008779;background-color: #008779">{{$qitem->name}}</td>
                            @endif
                        @endforeach
                        @foreach($category as $qitem)
                            @if($item->category==$qitem->id)
                                <td style="color: #FFFFFF;border-color: #008779;background-color: #008779">{{$qitem->name}}</td>
                            @endif
                        @endforeach
                        @foreach($source as $qitem)
                            @if($item->source==$qitem->id)
                                <td style="color: #FFFFFF;border-color: #008779;background-color: #008779">{{$qitem->name}}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection