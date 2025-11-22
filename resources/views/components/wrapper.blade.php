<div {{ $attributes->merge(['class' => 'w-full p-4']) }}>
    {{ $slot ?? null }}
</div>
