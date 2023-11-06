<script>
    import Input from './Input.svelte'
    export let value = ''
    export let error = ''
</script>

<Input type="email" {value} binder={(e) => (value = e.currentTarget.value)} {error}><slot>Input Email</slot></Input>
