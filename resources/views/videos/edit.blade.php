@extends('layouts.master')
@section('content')
    <div id="upload">
        <div class="row">
            <x-validation-errors/>
            <!-- upload -->
            <div class="col-md-8">
                <h1 class="page-title"><span>آپلود</span> ویدیو</h1>
                <form action="{{ route('videos.update', $video->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <label>@lang('videos.title')</label>
                            <input name="title" type="text" class="form-control" value="{{ $video->title }}"
                                   placeholder="@lang('videos.title')">
                        </div>
                        <div class="col-md-6">
                            <label>ویدیو</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>دسته‌بندی</label>
                            <select class="form-control" name="category_id" id="category">
                                @foreach ($categories as $category)
                                    <option
                                        value="{{ $category->id }}" {{ $category->id === $video->category_id ? 'selected' : ''}}> {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>توضیحات</label>
                            <textarea class="form-control" name="description" rows="4"
                                      placeholder="توضیح">{{ $video->description }}</textarea>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" id="contact_submit" class="btn btn-dm">ذخیره</button>
                        </div>
                    </div>
                </form>
            </div><!-- // col-md-8 -->

            <div class="col-md-4">
                <a href="#"><img src="{{ asset('img/upload-adv.png') }}" alt=""></a>
            </div><!-- // col-md-8 -->
            <!-- // upload -->
        </div><!-- // row -->
    </div>
@endsection
