@component('mail::message')
# Hello,

Here is the weekly organizational chart.

@component('mail::button', ['url' => '/orgchart'])
View Chart
@endcomponent

@endcomponent
