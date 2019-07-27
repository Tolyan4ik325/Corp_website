<?php
namespace Corp\Repositories;

use Corp\Menu;

class MenusRepository extends Repository{

	public function __construct(Menu $menu) {
		$this->model = $menu;
	}

	public function addMenu($request) {
		if(\Gate::denies('save', $this->model)) {
			abort(403);
		}

		$data = $request->only('type', 'title', 'parent');

		if(empty($data)) {
			return ['error' => 'Нет данных'];
		}
		// dd($request->all());
		switch ($data['type']) {
			case 'customLink':
				$data['path'] = $request->input('custom_link');
				break;
			
			case 'blogLink' : 
				if($request->input('category_alias')) {
					if($request->input('category_alias') == 'parent') {
						$data['path'] = route('articles.index');
					}
				}
			break;

		}
		unset($data['type']);

		if($this->model->fill($data)->save()) {
			return['status'=>'Ссылка добавлена'];
		}

}
}

?>