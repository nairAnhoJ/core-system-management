<div class="w-full h-[calc(100vh-152px)] mt-4">

    <div class="w-full h-[calc(100vh-206px)] overflow-y-auto overflow-x-hidden rounded-lg">
        <table class="w-full rounded-lg">
            <thead class="sticky top-0 tracking-wide bg-gray-300">
                <tr>
                    <th class="p-2 text-left">Name</th>
                    <th class="p-2">area</th>
                    <th class="p-2">address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr wire:key="model-{{ $result->id }}" class="text-center bg-gray-100 even:bg-gray-200">
                        <td class="p-2 text-left whitespace-nowrap">{{ $result->name }}</td>
                        <td class="p-2">{{ $result->area }}</td>
                        <td class="p-2 whitespace-nowrap">{{ $result->address }}</td>
                        <td>
                            <livewire:sites.edit-site :id="$result->id" :wire:key="'edit-'.$result->id">
                            <span class="mx-[1px]">|</span>
                            <livewire:sites.delete-site :id="$result->id" :wire:key="'delete-'.$result->id">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="w-full mt-4">
        {{ $results->links() }}
    </div>
    
</div>
