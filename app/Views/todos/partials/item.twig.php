{% macro todoItem(id, title, description, isFinished) %}

<li id="task-{{ id }}" x-data="{ isFinished: {{ isFinished ? 'true' : 'false' }} }" class="">
    <div class="task">
        <button
            @click="toggleStatus({{ id }}); isFinished = !isFinished; $dispatch('update-count', isFinished ? 1 : -1)"
            class="check"
            :class="{ 'active': isFinished }">
        </button>

        <span x-text="'{{id}} - {{ description }}'" :class="{'name-riscado': isFinished}"></span>
        <button class="close" @click="deleteTask({{ id }})">x</button>
    </div>
</li>

<script>
    function toggleStatus(id) {
        fetch(`/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    isFinished: true
                }),
            })
            .then((response) => response.json())
            .then((data) => {
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    function deleteTask(id) {
        fetch(`/${id}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Remove o item específico do DOM
            document.getElementById(`task-${id}`).remove();
            // Exibe a mensagem de sucesso
        } else {
            console.error('Erro:', data.message);
        }
    })
    .catch(error => console.error('Erro ao deletar tarefa:', error));
    }
</script>

{% endmacro %}