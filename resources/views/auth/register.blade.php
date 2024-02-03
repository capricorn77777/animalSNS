<!-- resources/views/auth/register.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- ユーザー情報のフォームフィールド -->

                            <label for="name">Name:</label>
                            <input type="text" name="name" required>
                            
                            <label for="email">Email:</label>
                            <input type="email" name="email" required>

                            <label for="password">Password:</label>
                            <input type="password" name="password" required>


                            <!-- 他のユーザー情報のフォームフィールド -->

                            <!-- 動物情報のフォームフィールド -->
                            <label for="animal_name">Animal Name:</label>
                            <input type="text" name="animal_name" required>

                            <label for="species">Species:</label>
                            <input type="text" name="species" required>

                            <label for="gender">Gender:</label>
                            <input type="text" name="gender" required>

                            <label for="birthday">Birthday:</label>
                            <input type="date" name="birthday" required>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
