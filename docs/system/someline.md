angular.layout.master

angulr.layout.master
	mobile.layout.master_mobile
		mobile.layout.frame_mobile
			mobile.layout.parts.mobile_header # 头部 <sl-app-header></sl-app-header>
				mobile.layout.parts.navbar.mobile_nav_header
				mobile.layout.parts.navbar.collapse
			mobile.layout.parts.content
			mobile.layout.parts.mobile_footer # 头部 <sl-app-tab-bar></sl-app-tab-bar>

			mobile.mobile_main # 主页面 mobile/ MobileController@getIndex <sl-app-home></sl-app-home>
			*mobile.mobile_app # App mobile/app MobileController@getApp <router-view></router-view>
