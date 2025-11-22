<div {{ $attributes->merge(['class' => 'w-full md:max-w-6xl mx-auto']) }}>
    {{ $slot ?? null }}
</div>
