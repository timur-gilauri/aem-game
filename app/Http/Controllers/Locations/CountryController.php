<?php

namespace App\Http\Controllers;


use App\Entities\Locations\CountryEntity;
use App\Repositories\Locations\CountryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CountryController extends Controller
{
    /** @var CountryRepository */
    protected $repo;

    public function __construct()
    {
        $this->repo = app(CountryRepository::class);
    }

    public function index(Request $request)
    {

        /** @var Collection $items */
        $items = $this->repo->all();

        return view('administrator.countries.index', [
            'items' => $items,
            'title' => 'Страны'
        ]);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(Request $request)
    {
        $id = $request->get('id', null);

        $this->validate($request, [
            'name'        => 'required|string|max:255' . ($id ? '' : '|unique:countries'),
            'title'       => 'required|string|max:255' . ($id ? '' : '|unique:countries'),
            'description' => 'required|string|max:1000',
            'arms'        => ($id ? '' : 'required'),
            'arms_shadow' => ($id ? '' : 'required'),
        ]);

        $entity = $id ? $this->repo->find($id) : new CountryEntity();

        $entity->setName($request->get('name'));
        $entity->setTitle($request->get('title'));
        $entity->setDescription($request->get('description'));
        if ($request->hasFile('arms')) {
            $entity->setArms($request->file('arms'));
        }
        if ($request->hasFile('arms_shadow')) {
            $entity->setArmsShadow($request->file('arms_shadow'));
        }

        try {
            $this->repo->save($entity);

            session()->flash('message', 'Страна успешно сохранена');

            return redirect(route('admin::countries::index'));
        } catch (\Exception $error) {
            return back()->withErrors($error->getMessage())->withInput();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.countries.edit');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $item = $this->repo->find($request->route('id'));

        $title = $item->getName();

        return view('administrator.countries.edit', compact('item', 'title'));
    }
}
