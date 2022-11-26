export default function InputError({ message, className='' }) {
    return message ? <p className={'text-sm text-red-700' + className}>{ message }</p> : null;
}