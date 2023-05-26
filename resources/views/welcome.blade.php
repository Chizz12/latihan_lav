@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="row">
            <form action="/" method="get">
                <select class="form-control" name="category" id="">
                    <option selected disabled value="">Pilih</option>
                    @foreach($category as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary mt-2 mb-2">Cari</button>
            </form>
        </div>
        @foreach($posts as $item)
        <div class="col-md-4 mb-3">
            <div class="card" style="width: 100%; height: 100%;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $item->user->name}} {{ $item->created_at->format('d/m/y')}}</h6>
                    <p class="card-text">{!! $item->body !!}</p>
                    <a href="/blog/{{$item->slug}}" class="card-link">Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection