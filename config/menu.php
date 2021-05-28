<?php 
return [
	[
		'name'  => 'Quản lý khách hàng',
		'icon'  => 'fa-address-card',
		'route' => '',
		'sub'   => [
			[
				'name' =>  'Loại khách hàng',
				'route' => 'CustomerType.index'
			],[
				'name' =>  'Danh sách khách hàng',
				'route' => 'customer.index'
			],[
				'name' =>  'Tài khoản bị ban',
				'route' => 'BanCustomer'
			],
		]
	],[
		'name'  => 'Quản lý danh mục',
		'icon'  => 'fa-list',
		'route' => '',
		'sub'   => [
			[
				'name' =>  'Danh sách danh mục',
				'route' => 'Category.index'
			],[
				'name' =>  'Thêm danh mục',
				'route' => 'Category.create'
			],
		]
	],[
		'name'  => 'Quản lý sản phẩm',
		'icon'  => 'fa-star',
		'route' => '',
		'sub'   => [
			[
				'name' =>  'Danh sách sản phẩm',
				'route' => 'Product.index'
			],[
				'name' =>  'Thêm sản phẩm',
				'route' => 'Product.create'
			],
		]
	],[
		'name'  => 'Quản lý dịch vụ',
		'icon'  => 'fa-phone-square',
		'route' => '',
		'sub'   => [
			[
				'name' =>  'Danh sách dịch vụ',
				'route' => 'Service.index'
			],[
				'name' =>  'Thêm dịch vụ',
				'route' => 'Service.create'
			],
		]
	],[
		'name'  => 'Quản lý blog',
		'icon'  => 'fa-edit',
		'route' => '',
		'sub'   => [
			[
				'name' =>  'Danh sách blog',
				'route' => 'Blog.index'
			],[
				'name' =>  'Quản lý bình luận',
				'route' => 'Comments.index'
			],[
				'name' =>  'Viết blog',
				'route' => 'Blog.create'
			],[
				'name' =>  'Thêm tag',
				'route' => 'Tag.index'
			],
		]
	],[
		'name'  => 'Quản lý đơn hàng',
		'icon'  => 'fa-file-text',
		'route' => 'order.index',
	]
];
?>