@servers(['aws' => '-i ~/ubuntukey.pem ubuntu@18.220.190.211'])

@include( 'vendor/autoload.php' )

@setup
$origin = 'git@github.com:djnimrod/financiera';
$branch = isset ($branch) ? $branch : 'master' ;
$app_dir = '/var/www/html' ;
	if (!isset($on ) ){
		throw new Exception('La variable --on no esta definida ');
	}
@endsetup

@task( 'git:clone' ,  [ 'on' => $on ] )
	cd {{ $app_dir }}
	echo " entrando al directorio /var/www/html" ;
	git clone {{ $origin }} ;
	echo "repositorio clonado correctamente" ;
	@endtask

@task( 'ls', ['on'=>'aws'] )
    cd /var/www/
    ls -la
    echo "tarea de Listado"
@endtask

@task( 'test' )
echo {{$branch}}
@endtask


