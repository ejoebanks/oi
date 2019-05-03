@component('mail::message')
# Hello,

Here is the recent changes.

@component('mail::button', ['url' => '/recent'])
View Changes
@endcomponent

@endcomponent
