@include("MainParts.header")

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

@if(session()->has('deleteError'))
    <div class="alert alert-danger">
        {{session()->get("deleteError")}}
    </div>
@endif


<h1 class="h3 mb-2 text-gray-800">Felhasználó csoportok</h1>
          <p class="mb-4">{!! Texts::GetText("groups_desc") !!}</p>
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                  <a href="/felhasznalo-csoportok/uj" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Létrehozás</span>
                  </a></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Név</th>
                      <th>Létrehozás dátuma</th>
                      <th>Lehetőségek</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Név</th>
                        <th>Létrehozás dátuma</th>
                        <th>Lehetőségek</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($groups as $group)
                    <tr>
                      <td><a href="/felhasznalo-csoportok/{{$group->id}}">{{$group->name}}</a></td>
                      <td>{{$group->created_at}}</td>
                      <td>
                          <a style="display: inline-block;" class="btn btn-warning btn-circle btn-sm" href="/felhasznalo-csoportok/{{$group->id}}/szerkeszt"><i class="fas fa-edit"></i></a>
                          <form style="display: inline-block;" action="/felhasznalo-csoportok/{{$group->id}}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-danger btn-circle btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        
                    </td>
                    </tr>
                        
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          @include("MainParts.footer")