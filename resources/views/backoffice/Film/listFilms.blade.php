<html>
    <title>Liste des Films</title>
<body>
    
    Liste des Films :
    <ul>
    @foreach( $films as $film)
        <li>{{ $film['titre'] }}, {{ $film['year'] }}</li> 
    @endforeach
    </ul>
</body>
</html>
