@extends('layouts.app')

@section('content')
<h3>Daftar Score</h3>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Score
</button>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Klub 1</th>
            <th scope="col">Score 1</th>
            <th scope="col">Klub 2</th>
            <th scope="col">Score 2</th>
            <th scope="col">Winner</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $item)
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{ $item->data_klub_1->nama }}</td>
            <td>{{ $item->score_1 }}</td>

            <td>{{ $item->data_klub_2->nama }}</td>
            <td>{{ $item->score_2 }}</td>

            @if ( empty($item->winner_klub) )
            <td>Seri</td>
            @else
                
            <td>{{ $item->data_winner_klub->nama}}</td>
            @endif

        </tr>
        @endforeach
    </tbody>
</table>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" role="form" enctype="multipart/form-data" action="{{ route('score.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Score</h5>

                </div>
                <div class="modal-body">
                    <div id="form-tambah">
                        <h6>Score 1</h6>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Klub 1</label>
                                    <select name="klub_1[]" class="form-control"  required>
                                        @foreach ($klub as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                     
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Klub 2</label>
                                    <select name="klub_2[]" class="form-control"  required>
                                        @foreach ($klub as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Score 1</label>
                                    <input type="number" class="form-control" name="score_1[]" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Score 2</label>
                                    <input type="number" class="form-control" name="score_2[]" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        
                        
                    </div>
                    <hr>
                    <button type="button" id="add" class="btn btn-primary">Add</button>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    var klub_count = 1
$("#add").on('click', function() {
            klub_count = klub_count + 1
            var data = '<h6>Score '+klub_count+'</h6>' +
            '<div class="row">'+
            '<div class="col">'+
            '<div class="form-group">'+
            '<label for="exampleInputEmail1">Klub 1</label>'+
            `<select class="form-control"  name="klub_1[]" required>
                                        @foreach ($klub as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>`+
            '</div>'+
            '</div>'+
            '<div class="col">'+
            '<div class="form-group">'+
            '<label for="exampleInputEmail1">Klub 2</label>'+
            `<select class="form-control"  name="klub_2[]" required>
                                        @foreach ($klub as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>`+
            '</div>'+
            '</div>'+
            '</div>'+
            '<div class="row">'+
            '<div class="col">'+
            '<div class="form-group">'+
            '<label for="exampleInputEmail1">Score 1</label>'+
            '<input type="text" class="form-control" name="score_1[]" required>'+
            '</div>'+
            '</div>'+
            '<div class="col">'+
            '<div class="form-group">'+
            '<label for="exampleInputEmail1">Score 2</label>'+
            '<input type="text" class="form-control" name="score_2[]" required>'+
            '</div>'+
            '</div>'+
            '</div>'+
            '<br>';

            $('#form-tambah').append(data);

        });
</script>
@endsection