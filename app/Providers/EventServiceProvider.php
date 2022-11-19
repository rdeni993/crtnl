<?php

namespace App\Providers;

use App\Events\FileAssignedEvent;
use App\Events\FileDownloadedEvent;
use App\Events\FileRemovedEvent;
use App\Events\NewUserCreatedEvent;
use App\Events\NewUserNotCreatedEvent;
use App\Events\UserLoginEvent;
use App\Events\UserLoginFailedEvent;
use App\Events\UserRemovedEvent;
use App\Events\UserUpdatedEvent;
use App\Listeners\FileAssignedToUserListener;
use App\Listeners\FileDownloadListener;
use App\Listeners\FileRemovedListener;
use App\Listeners\LogFailedLoginListener;
use App\Listeners\LogFailedRegistrationListener;
use App\Listeners\NewUserListener;
use App\Listeners\NotifyAboutUserRemovedActionListener;
use App\Listeners\RedirectToLoginListener;
use App\Listeners\RemoveFileRelatedToRemovedUserListener;
use App\Listeners\UserDataChangedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        NewUserCreatedEvent::class => [
            NewUserListener::class
        ],
        
        NewUserNotCreatedEvent::class => [
            LogFailedRegistrationListener::class
        ],

        UserLoginEvent::class => [],

        UserLoginFailedEvent::class => [
            LogFailedLoginListener::class
        ],

        UserRemovedEvent::class => [
            RemoveFileRelatedToRemovedUserListener::class,
            NotifyAboutUserRemovedActionListener::class,
        ],

        FileAssignedEvent::class => [
            FileAssignedToUserListener::class
        ],

        UserUpdatedEvent::class => [
            UserDataChangedListener::class
        ],

        FileDownloadedEvent::class => [
            FileDownloadListener::class
        ],

        FileRemovedEvent::class => [
            FileRemovedListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
