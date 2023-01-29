@extends('layouts.app')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>150</h3>

            <p>New Orders</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>

            <p>Bounce Rate</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>44</h3>

            <p>User Registrations</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>65</h3>

            <p>Unique Visitors</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->

  <table class="table">
    <div class="">
      <form action="{{ route('users.index') }}" method="GET" role="search">

        <div class="input-group">
          <span class="input-group-btn mr-3">
            <button class="btn btn-info" type="submit" title="Search projects">
              <span class="fas fa-search"></span>
            </button>
          </span>
          <input type="text" class="form-control" name="term" placeholder="Search projects" id="term">
          <a href="{{ route('users.index') }}">
            <span class="input-group-btn ml-3">
              <button class="btn btn-danger" type="button" title="Refresh page">
                <span class="fas fa-sync-alt"></span>
              </button>
            </span>
          </a>
        </div>
      </form>
    </div>
    <thead>
      <tr>
        <th scope="col"><a href="{{ route('user-create') }}"><i class="fas fa-solid fa-plus"></i></a></th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Created_at</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $key => $user)
      <tr>
        <th scope="row">{{ $key+1 }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->created_at }}</td>
        <td>
          <a href="/admin/user-edit/{{ $user->id }}"><i class="fas fa-edit"></i></a>
          <a href="/admin/user-delete/{{ $user->id }}"><i class="fas fa-trash-alt"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $users->links() }}
</section>
<!-- /.content -->
@endsection