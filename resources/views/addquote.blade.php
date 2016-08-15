@extends('layouts.app')

@section('content')
    <div class="container" style="width: 100%">
        <div class="panel panel-primary" style="width: 100%;border-color: #008779">
            <div class="panel-heading" style="border: none">AddQuotes</div>
            <div class="panel-body">
                <form method="post" action="addguoted" style="color: #FFFFFF">
                    <div class="label">AddQuoted</div>
                    <p/>
                    <label>Name</label>
                    <input type="text" class="form-control" name="name">
                    <button type="submit" class="btn btn-primary" style="background-color: #008779;border-color: #008779">Save</button>
                </form>
                <p/>
                <form method="post" action="addguotes" style="color: #FFFFFF">
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
                    <input type="text" class="form-control" name="Category">
                    <label>Source</label>
                    <input type="text" class="form-control" name="Source">
                    <button type="submit" class="btn btn-primary" style="background-color: #008779;border-color: #008779">Save</button>
                </form>
                <p/>
                <table style="color: #FFFFFF;border-color: #008779;background-color: #008779" border="1">
                    @foreach($quoted as $item)
                        <tr>
                            <td style="color: #FFFFFF;border-color: #008779;background-color: #008779">
                                {{$item->name}}
                            </td>
                        </tr>
                    @endforeach
                </table>
                <p/>
                <table style="color: #FFFFFF;border-color: #008779;background-color: #008779;border-collapse: separate;border-spacing: 2px" border="1">
                    <tr>
                        <td style="color: #FFFFFF;border-color: #008779;background-color: #008779">Quote</td>
                        <td style="color: #FFFFFF;border-color: #008779;background-color: #008779">Quoted</td>
                        <td style="color: #FFFFFF;border-color: #008779;background-color: #008779">Category</td>
                        <td style="color: #FFFFFF;border-color: #008779;background-color: #008779">Source</td>
                    </tr>
                    @foreach($quotes as $item)
                        <tr>
                            <td style="color: #FFFFFF;border-color: #008779;background-color: #008779">{{$item->quote}}</td>
                            <td style="color: #FFFFFF;border-color: #008779;background-color: #008779">{{$item->category}}</td>
                            @foreach($quoted as $qitem)
                                @if($item->quoted==$qitem->id)
                                    <td style="color: #FFFFFF;border-color: #008779;background-color: #008779">{{$qitem->name}}</td>
                                @endif
                            @endforeach
                            <td style="color: #FFFFFF;border-color: #008779;background-color: #008779">{{$item->source}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection