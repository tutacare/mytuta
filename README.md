# mytuta
Just tools

Install:
<pre>
"require": {
        "laravel/framework": "5.2.*",
        ...
        "tuta/mytuta": "1.1.*"
    },
</pre>

<pre>
composer update
</pre>

<pre>
'providers' => array(
        ...
        Tuta\Mytuta\MytutaServiceProvider::class,
    ),
</pre>

<pre>
'alias' => array(
        ...
        'Mytuta' => Tuta\Mytuta\Facades\MytutaFacade::class,
    ),
</pre>

# Upload File
<pre>
$upload = (Mytuta::Uploadfile($request->file('file'),'yourfolder'));

return:
$upload['name'] //mengambil nama file
$upload['size'] //mengambil data ukuran file
$upload['mime'] //mengambil mime type dari file yang di upload
</pre>

#Upload Image
<pre>
$upload = Mytuta::uploadImage($image, $path, $width, $height);

return:
$upload = Image Name
</pre>

# Read File & Image
<pre>
Route::get('your-url/{file}', function($file = null)
{
    return Mytuta::readFile($file,'yourfolder');
});
</pre>
