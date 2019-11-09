@servers( [ 'aws' => 'ubuntu@18.220.190.211'  ] )

@include( 'vendor/autoload.php' )

@task( 'test' )
echo "tarea test ejecutada"
@endtask


