<script>
    export let type = 'text',
        value = '',
        placeholder = ''
</script>

<div class="input-text">
    <label for="username"><slot /></label>
    <input
        type={type === 'password' ? 'password' : 'text'}
        on:input={(e) => (value = e.currentTarget.value)}
        placeholder={placeholder}
    />
</div>

<style>
    .input-text {
        @apply flex justify-between;
    }
    input {
        @apply rounded w-40 text-white;
        background-color: rgba(170, 170, 170, 0.5);
    }
    input:hover {
        background-color: rgba(170, 170, 170, 0.8);
    }
</style>
