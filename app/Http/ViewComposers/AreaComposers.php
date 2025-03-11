<?PHP

namespace App\Http\ViewComposers;

use App\Models\Area;
use Illuminate\View\View;



class AreaComposers
{

    private $area;
    public function compose(View $view)
    {
        if(!$this->area){
            $this->area = Area::where('slug', session()->get('area', config()->get('fresh.defaults.area')))->first();
        }
        
        return $view->with('area', $this->area);
    }
}