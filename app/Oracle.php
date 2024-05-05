namespace App\Oracle;

class Config {

    public static function dynamicConfig(&$config) {

        if (Illuminate\Support\Facades\Auth::check()) {
            $config['username'] = App\Oracle\Config::getOraUser();
            $config['password'] = App\Oracle\Config::getOraPass();
        }

    }
}