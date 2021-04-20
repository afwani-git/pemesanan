<html>
<head>
	<title>Laporan Siswa Yang aktif</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Siswa Yang aktif</h4>
	</center>
    
    @foreach ( $laporan as $l )
        <center style="margin-top: 6pt"><h5>{{$l['nama']}}</h5></center>
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($l['pemesan'] as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$p['nama']}}</td>
                    <td>{{$p['alamat']}}</td>
                    <td>{{$p['kota']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>     
    @endforeach
 
</body>
</html>