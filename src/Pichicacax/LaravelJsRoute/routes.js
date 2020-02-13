var routes = '{ routes }';

export function route() {
    var args = Array.prototype.slice.call(arguments);
    var name = args.shift();

    if (routes[name] === undefined) {
        console.error('Unknown route ', name);
    } else {
        return '/' + routes[name]
            .split('/')
            .map(s => s[0] == '{' ? args.shift() : s)
            .join('/');
    }
};