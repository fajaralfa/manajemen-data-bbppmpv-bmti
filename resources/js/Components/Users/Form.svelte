<script>
    import InputText from '../Formulir/InputText.svelte'
    import RadioGroup from '../Formulir/RadioGroup.svelte'
    export let input = {
        name: null,
        username: null,
        password: null,
        role: 'operator',
    }
    export let submit
    export let errors
    export let submitValue = 'Simpan'
</script>

<div class="p-10">
    <form class="flex flex-col gap-y-6 items-center" on:submit|preventDefault={() => submit(input)}>
        <div class="input-container">
            <InputText bind:value={input.name} error={errors.name}>Name:</InputText>
            <InputText bind:value={input.username} error={errors.name}>Username:</InputText>
            <InputText bind:value={input.password} error={errors.name}>Password:</InputText>
            <RadioGroup bind:value={input.role} options={{ Operator: 'operator', Admin: 'admin' }} error={errors.name}
                >Role:</RadioGroup
            >
            <div class="justify-self-center">
                <input class="btn btn-neutral" type="submit" name="submit" value={submitValue} />
            </div>
        </div>
    </form>
</div>

<style>
    .input-container {
        @apply grid grid-cols-1 gap-y-4 px-16 py-10 h-96 rounded-xl w-[40rem];
        background-color: rgba(0, 0, 0, 0.5);
        grid-template-rows: repeat(14, auto);
    }
</style>
