<script>
    import { useForm, page } from '@inertiajs/svelte'
    import InputText from '../Formulir/InputText.svelte'
    import RadioGroup from '../Formulir/RadioGroup.svelte'

    export let submit
    export let submitValue = 'Simpan'

    let form = useForm({
        name: null,
        username: null,
        password: null,
        role: 'operator',
    })
</script>

<div class="p-10">
    <form class="flex flex-col gap-y-6 items-center" on:submit|preventDefault={() => submit($form)}>
        <div class="input-container">
            <InputText bind:value={$form.name} error={$page.props.errors.name}>Name:</InputText>
            <InputText bind:value={$form.username} error={$page.props.errors.username}>Username:</InputText>
            <InputText bind:value={$form.password} error={$page.props.errors.password}>Password:</InputText>
            <RadioGroup bind:value={$form.role} options={{ Operator: 'operator', Admin: 'admin' }} error={$page.props.errors.role}
                >Role:</RadioGroup>
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
