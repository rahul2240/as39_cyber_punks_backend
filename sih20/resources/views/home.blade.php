@extends('layouts.dashboard')

@section('css')
<style type="text/css">
.cascading-admin-card {
 margin-top: 20px;
}
.cascading-admin-card .admin-up {
 margin-left: 4%;
 margin-right: 4%;
 margin-top: -20px;
 }.cascading-admin-card .admin-up .fab, .cascading-admin-card .admin-up .far, .cascading-admin-card .admin-up .fas {
  padding: 1.7rem;
  font-size: 2rem;
  color: #fff;
  text-align: left;
  margin-right: 1rem;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  }.cascading-admin-card .admin-up .fab, .cascading-admin-card .admin-up .far, .cascading-admin-card .admin-up .fas, .z-depth-2 {
    -webkit-box-shadow: 0 8px 17px 0 rgba(0,0,0,.2),0 6px 20px 0 rgba(0,0,0,.19)!important;
    box-shadow: 0 8px 17px 0 rgba(0,0,0,.2),0 6px 20px 0 rgba(0,0,0,.19)!important;
    }.cascading-admin-card .admin-up .data {
      float: right;
      margin-top: 2rem;
      text-align: right;
    }
  </style>
  @stop

  @section('content')
  <div class="row">
 
      <!--Grid column-->
      <div class="col-xl-6 col-md-6 mb-6">

        <!--Card-->
        <div class="card card-cascade cascading-admin-card">


           <!--Card Data-->
          <div class="admin-up">
            <i class="fas fa-bolt danger-color"></i>
            <div class="data">
              <p class="mb-2"> Terms and Conditions</p>
              <p class="mb-2"> Total Count:<?php echo "$contt" ?></p>
              <div style="margin-left: -350px;">
              <table class="table mr-4">
                <thead>
                  <tr>
                    <th scope=""><i>Title</i></th>


                  </tr>
                </thead>
                <tbody>
                  @foreach($terms as $term)
                  
                  <tr>
                    

                    
                    <td><a href="tnc/{{$term->id}}">{{ $term->title }}</a></td>
                    <br>
                    @endforeach
                  </tr>
                  </tr>
                </tbody>
              </table>
            </div>
            </div>
          </div>
          <!--/.Card Data-->

          

        </div>
        <!--/.Card-->

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-xl-6 col-md-6 mb-6">

        <!--Card-->
        <div class="card card-cascade cascading-admin-card">

          <!--Card Data-->
          <div class="admin-up">
            <i class="fas fa-users warning-color"></i>
            <div class="data">
              <p class="mb-2"> Recent Users</p>
              <p class="mb-2"> Total Count:<?php echo "$cont" ?></p>
              <div style="margin-left: -400px;">
              <table class="table mr-4">
                <thead>
                  <tr>
                    <th scope=""><i>Users List</i></th>


                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $man)
                  
                  <tr>
                    

                    
                    <td>{{ $man->name }}</td>
                    <br>
                    @endforeach
                  </tr>
                  </tr>
                </tbody>
              </table>
            </div>
            </div>
          </div>
          <!--/.Card Data-->

        </div>
        <!--/.Card-->

      </div>
      <!--Grid column-->

   {{--  <!--Grid column-->
    <div class="col-xl-4 col-md-4 mb-4">

      <!--Card-->
      <div class="card card-cascade cascading-admin-card">

        <!--Card Data-->
        <div class="admin-up">
          <i class="fas fa-align-left light-blue lighten-1"></i>
          <div class="data">
            <p>Blogs</p>
            <h4 class="ml-4 mt-4 mb-2 font-weight-bold">1</h4>
          </div>
        </div>
        <!--/.Card Data-->

      </div>
      <!--/.Card-->

    </div>
    <!--Grid column--> --}}


  </div>

  @stop

  @section('script')
@stop
