<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<script type="text/javascript" src="{{ asset("js/jquery-3.1.1.min.js") }}"></script>
	<link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset("DataTables/datatables.min.css") }}"/>

	<script type="text/javascript" src="{{ asset("DataTables/datatables.min.js") }}"></script>
	<script src="{{ asset("js/bootstrap.js") }}"></script>

</head>
<body>
	<script>
		$(document).ready( function () {
			$('#myTable').DataTable();
		} );

		$(document).ready( function () {
			$('#myTable1').DataTable();
		} );
	</script>
	<table height="50%">
		<tr >
			<td width="50%"> 
				<table id="myTable">
					<thead>
						<tr>
							<th>No</th>
							<th>Kehadiran</th>
							<th>Tugas</th>
							<th>UTS</th>
							<th>UAS</th>
							<th>Nilai</th>
							<th>Target</th>
						</tr>
					</thead>
					<tbody>
						@php
							$no=1;
						@endphp
						@foreach ($items as $item)
						{{-- expr --}}
						<tr>
							<td>{{ $no}}</td>
							<td>{{ $item->Kehadiran }}</td>
							<td>{{ $item->Tugas }}</td>
							<td>{{ $item->UTS }}</td>
							<td>{{ $item->UAS }}</td>
							<td>{{ $item->Nilai }}</td>
							<td>{{ $item->Target }}</td>
						</tr>
						@php
							$no++;
						@endphp
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>No</th>
							<th>Kehadiran</th>
							<th>Tugas</th>
							<th>UTS</th>
							<th>UAS</th>
							<th>Nilai</th>
							<th>Target</th>
						</tr>
					</tfoot>
				</table>
			</td>
			<td align="top">
				<form method="post" id="form1">
					@csrf

					Kehadiran :<input type="text" class="form-control gg" v-align="top" required name="Kehadiran"><br>
					Tugas:<input type="text" class="form-control gg" v-align="top" required name="Tugas"><br>
					UTS:<input type="text" class="form-control gg" v-align="top" required name="UTS"><br>
					UAS:<input type="text" class="form-control gg" v-align="top" required name="UAS"><br>
					Nilai:<input type="text" class="form-control gg" v-align="top" required name="Nilai"><br>
					<input type="submit" name="submit" value="Prediksi">
				</form>
				Hasil Target Perhitungan : <input type="text" class="gg" id="target" readonly>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<table id="myTable1">
					<thead>
						<tr>
							<th>No</th>
							<th>Kehadiran</th>
							<th>Tugas</th>
							<th>UTS</th>
							<th>UAS</th>
							<th>Nilai</th>
							<th>Target</th>
						</tr>
					</thead>
					<tbody id="data">
						
					</tbody>
					<tfoot>
						<tr>
							<th>No</th>
							<th>Kehadiran</th>
							<th>Tugas</th>
							<th>UTS</th>
							<th>UAS</th>
							<th>Nilai</th>
							<th>Target</th>
						</tr>
					</tfoot>
				</table>
			</td>
		</tr>

	</table>
	<script>
        getData();
		
		$('#form1').submit(function(e){
      		var url = "{{ route('data.store') }}";
        $.ajax({

            type : 'post',

            url : url,

            data:$(this).serialize(),

            success:function(data){
               $('#target').val(data);
            }

        });
        e.preventDefault();

        getData();
     	});

        $('.gg').val('');

     	function getData(){
     		$.ajax({

            type : 'get',

            url : '{{ URL::to('prediksi') }}',

            data:{},

            success:function(data){

                $('#data').html(data);

            }

        });
     	}
	</script>
</body>
</html>