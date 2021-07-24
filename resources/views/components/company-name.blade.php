
@isset($company)
{{ $company->name }}
@endisset

@empty($company)
{{ config('app.name') }}
@endempty
