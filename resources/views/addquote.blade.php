@extends('layouts.app')

@section('content')
    <div class="container" style="width: 100%">
        <div class="panel panel-primary" style="width: 100%;border-color: #008779">
            <div class="panel-heading" style="border: none">AddQuotes</div>
            <div class="panel-body">
                <form method="post" action="addguoted" style="color: #FFFFFF">
                    {{ csrf_field() }}
                    <div class="label">AddQuoted</div>
                    <p/>
                    <label>Name</label>
                    <input type="text" class="form-control" name="name">
                    <button type="submit" class="btn btn-primary" style="background-color: #008779;border-color: #008779">Save</button>
                </form>
                <p/>
                <form method="post" action="addguotes" style="color: #FFFFFF">
                    {{ csrf_field() }}
                    <div class="label">AddQuotes</div>
                    <p/>
                    <label>Quote</label>
                    <input type="text" class="form-control" name="quote">
                    <label>Quoted</label>
                    <select class="form-control" name="quoted">
                        @foreach($quoted as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <label>Category</label>
                    <select class="form-control" name="category">
                        @foreach($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <label>Source</label>
                    <select class="form-control" name="source">
                        @foreach($source as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary" style="background-color: #008779;border-color: #008779">Save</button>
                </form>
                <p/>
                <table style="color: #FFFFFF;border-color: #008779;background-color: #008779;border-collapse: separate;border-spacing: 2px" border="1">
                    <tr>
                        <td style="color: #FFFFFF;border-color: #008779;background-color: #008779;font-weight: bold">ID</td>
                        <td style="color: #FFFFFF;border-color: #008779;background-color: #008779;font-weight: bold">List of Quoted</td>
                    </tr>
                    @foreach($quoted as $item)
                        <tr>
                            <td style="color: #FFFFFF;border-color: #008779;background-color: #008779">
                                {{$item->id}}
                            </td>
                            <td style="color: #FFFFFF;border-color: #008779;background-color: #008779">
                                {{$item->name}}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <p/>
                <table style="color: #FFFFFF;border-color: #008779;background-color: #008779;border-collapse: separate;border-spacing: 2px" border="1">
                    <tr>
                        <td style="color: #FFFFFF;border-color: #008779;background-color: #008779;font-weight: bold">ID</td>
                        <td style="color: #FFFFFF;border-color: #008779;background-color: #008779;font-weight: bold">Quote</td>
                        <td style="color: #FFFFFF;border-color: #008779;background-color: #008779;font-weight: bold">Quoted</td>
                        <td style="color: #FFFFFF;border-color: #008779;background-color: #008779;font-weight: bold">Category</td>
                        <td style="color: #FFFFFF;border-color: #008779;background-color: #008779;font-weight: bold">Source</td>
                    </tr>
                    @foreach($quotes as $item)
                        <tr>
                            <td style="color: #FFFFFF;border-color: #008779;background-color: #008779">{{$item->id}}</td>
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