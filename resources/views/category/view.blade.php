@extends('layout.container')

@section('top-wrapper')
    @include('partials.backbutton')
    @include('partials.detailtxt')
    <div class="action">
        <a href="/category/destroy/{{ $category->id }}"><i class='bx bxs-trash'></i></a>
    </div>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-info">
        <h1>{{ $category->category }}</h1>
        <div class="times">
            <span>{{ $category->created_at->format('l') }}</span>
            <span>{{ $category->created_at->format('d M Y') }}</span>
            <span>{{ $category->created_at->format('h:i A') }}</span>
        </div>
    </div>
</div>
<div class="mid-content">
    <div class="frame">
        <div class="frame-section">
            Tipe
            <span class="bold">{{ $category->type }}</span>
        </div>
    </div>
    <div class="divider"><span>-</span></div>
    <div class="desc-box">
        <span class="bold">Keterangan</span>
        <div class="desc">
            {{ $category->desc }}
        </div>
    </div>
</div>        
<div class="action-edit">
    <a href="#">Edit</a>
</div>
@endsection