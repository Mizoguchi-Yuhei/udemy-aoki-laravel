@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- <form action="{{ route('contact.create') }}" method="GET">
                        <button type="submit" class="btn btn-primary">新規登録</button>
                    </form> --}}
                        <a href="{{ route('contact.create') }}" class="btn btn-secondary" tabindex="1" role="button"
                            aria-disabled="true">新規登録
                        </a>
                        <br>
                        {{-- <a href="{{ route('contact.create') }}">新規登録</a> --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">名前</th>
                                    <th scope="col">タイトル</th>
                                    <th scope="col">登録日時</th>
                                    <th scope="col">詳細</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $key=>$contact)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        {{ $contact->id }}
                                    </td>
                                    <td>
                                        {{ $contact->your_name }}
                                    </td>
                                    <td>
                                        {{ $contact->title }}
                                    </td>
                                    <td>
                                        {{ $contact->created_at }}
                                    </td>
                                    <td>
                                        <a href="{{route('contact.show', ['id' => $contact->id])}}">詳細を見る</a>
                                    </td>
                                </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
