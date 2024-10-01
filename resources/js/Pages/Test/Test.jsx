import { Head, Link, useForm } from '@inertiajs/react';

export default function TestPage({ auth, laravelVersion, phpVersion }) {
    const handleImageError = () => {
        document.getElementById('screenshot-container')?.classList.add('!hidden');
        document.getElementById('docs-card')?.classList.add('!row-span-1');
        document.getElementById('docs-card-content')?.classList.add('!flex-row');
        document.getElementById('background')?.classList.add('!hidden');
    };

    return (
      <>
        <Head title="test" />
        <div className="">
          <h1>test</h1>
        </div>
      </>
    );
}

// test

const testForm = ({ item }) => {
    const { data, setData, post, progress } = useForm({
      name: null,
      avatar: null,
    });

    function submit(e) {
        e.preventDefault()
        post('/users')
    }

    return (
      <form onSubmit={submit}>
        <input type="text" value={data.name} onChange={(e) => setData('name', e.target.value)} />
        <input
          type="file"
          value={data.avatar}
          onChange={(e) => setData('avatar', e.target.files[0])}
        />
        {progress && (
          <progress value={progress.percentage} max="100">
            {progress.percentage}%
          </progress>
        )}
        <button type="submit">Submit</button>
      </form>
    );
}