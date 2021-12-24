export const only = (obj, props) => {
    const res = {};
    for (const prop of props) {
        if (obj.hasOwnProperty(prop)) {
            res[prop] = obj[prop];
        }
    }

    return res;
}
