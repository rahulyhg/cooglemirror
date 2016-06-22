<?php namespace Cooglemirror\Clock;

use Illuminate\Support\ServiceProvider;

class ClockServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('cooglemirror/clock', 'cooglemirror-clock');
		
		\Event::listen('cooglemirror.render', function($layoutView) {
		    $view = \View::make('cooglemirror-clock::widget')->render();
		    $layoutView->with(\Config::get('cooglemirror-clock::widget.placement'), $view);
		});
		
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
