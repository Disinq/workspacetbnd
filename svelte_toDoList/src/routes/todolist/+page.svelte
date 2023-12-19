<script lang="ts">
    import { fade } from 'svelte/transition';

	let error = false;

    let newItem = '';
	
    let todoList:Array<string> = [];
	
	function addToList() {
		if (newItem !== ''){
            todoList = [...todoList, newItem];
            newItem = '';
            error = false;
        }
        else {
            error = true;
        }
	}
	
	function removeFromList(index:number) {
		todoList.splice(index, 1)
		todoList = todoList;
    }

</script>

<h1>Bonjour voici une ToDoList, on me braque pour la faire</h1>

    <input
    class:error={error}
    bind:value={newItem} 
    type="text"
    placeholder="Veuillez inscrire du texte">

<button on:click={addToList}>Ajoutez</button>

<br/>
    {#each todoList as item, index}
        <div transition:fade>
            <span>{item}</span>
            <span on:click={() => removeFromList(index)}>❌</span>
            <br/>
        </div>
    {/each}

<style>
    input.error {
        border-color: red;
    }
    input.error::placeholder{
        color: red;
    }
</style>