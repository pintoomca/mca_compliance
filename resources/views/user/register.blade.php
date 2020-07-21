
@extends('layout.master')
@section('title', 'Compliance Monitoring Portal : Registration')
@section('content')
<div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{asset('assets/CoolAdmin/images/icon/logo.png')}}" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        @foreach ($errors->all() as $message)
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @endforeach
                        <form action="{{ url('/registerSubmit') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input class="au-input au-input--full" type="text" name="fname" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <label>Middel Name</label>
                                    <input class="au-input au-input--full" type="text" name="mname" placeholder="Middel Name">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="au-input au-input--full" type="text" name="lname" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="au-input au-input--full" type="password" name="confirmed" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <input class="au-input au-input--full" type="text" name="cat_id" placeholder="Category">
                                </div>



                                <div class="row">
                                    <div class="col-6">
                                    <div class="form-group">
                                    <label>Department Name</label>
                                    <input class="au-input au-input--full" type="text" name="dept_id" placeholder="Department Name">
                                </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-group">
                                    <label>Location</label>
                                    <input class="au-input au-input--full" type="text" name="location_id" placeholder="Location">
                                </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                    <div class="form-group">
                                    <label>Reporting Person</label>
                                    <input class="au-input au-input--full" type="text" name="reporting_user_id" placeholder="Reporting Person">
                                    </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="form-group">
                                    <label>Role</label>
                                    <input class="au-input au-input--full" type="text" name="role_id" placeholder="Role">
                                </div>
                                </div>
                               </div>

                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Register</button>
                                <!-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">register with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">register with twitter</button>
                                    </div>
                                </div> -->
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="#">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
@stop
