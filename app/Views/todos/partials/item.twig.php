{% macro todoItem(id, title, description, isFinished) %}
<li x-data="{ isFinished: {{ isFinished ? 'true' : 'false' }} }" class="">
    <div class="task">
        <!-- <input type="checkbox" name="isCheck" id=""> -->
        <button
            @click="isFinished = !isFinished; $dispatch('update-count', isFinished ? 1 : -1)"
            class="check"
            :class="{ 'active': isFinished }">
        </button>

        <span x-text="'{{ description }}'" :class="{'name-riscado': isFinished}"></span>
        <button class="close" @click="console.log('id task: {{ id }}'); $dispatch('remove-task', {{ id }})">x</button>
    </div>
</li>
{% endmacro %}