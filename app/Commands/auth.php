<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class auth extends Command
{
    private $baseFolder = 'auth_system\\';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:myauth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auth system is activated';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = base_path('auth_system');
        $files = File::allFiles($path);
      
        foreach($files as $file)
        {
            $data               = file_get_contents($file);
            $basename           = basename($file);
            $destinationPath    = dirname($file);
            $destinationPath    = explode($this->baseFolder, $destinationPath)[1];
            
            $this->createFile($data, $destinationPath, $basename);
        }

        $routeData      = "\n\nRoute::get('langs/{locale}',[App\Http\Controllers\profileController::class,'langSwitcher'])
        ->name('lang.swithcher');\n\nRoute::get('daxil-ol',[App\Http\Controllers\sign\sign_in_upController::class,'login'])
    ->middleware('locale')
    ->name('login');\n\nRoute::post('daxil-ol',[App\Http\Controllers\sign\sign_in_upController::class,'loginPost'])
    ->middleware('locale')
    ->middleware('throttle:5,60')
    ->name('login.post');\n\nRoute::get('cixis-et',[App\Http\Controllers\sign\sign_in_upController::class,'logout'])
    ->middleware( 'auth' )
    ->name( 'logout' );\n\nRoute::post('avatar-upload',[ App\Http\Controllers\profileController::class,'avatarUpload' ])
    ->name('front.avatar.upload')
    ->middleware('auth');\n\nRoute::post('profile',[ App\Http\Controllers\profileController::class,'profileUpdate' ])
    ->name('front.profile.update')
    ->middleware('auth');\n\nRoute::group(['prefix'=>'admin','middleware'=>['auth', 'locale']],function (){\n\nRoute::get('/',[App\Http\Controllers\AdminController::class,'index'])
    ->name('back.dashboard');\nRoute::get('profile',[App\Http\Controllers\profileController::class,'profile'])
    ->name('back.profile');\n\nRoute::resource('option',App\Http\Controllers\OptionController::class);\n\n});
            ";
            $fp             = fopen(base_path().'/routes/web.php', 'a');
            fwrite($fp, $routeData);


            Artisan::call('options:create');

            $this->info('Auth system installed successfully');
    }

    public function createFile($data, $destinationPath, $basename)
    {
        if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
        File::put($destinationPath.'\\'.$basename,$data);
        // return response()->download($destinationPath.'/'.$basename);
    }
}
